from flask import Flask, jsonify, redirect, request, render_template
import pickle
from markupsafe import Markup
import numpy as np
import pandas as pd
import seaborn as sns
import matplotlib.pyplot as plt
import io
import base64
from pymongo import MongoClient


app = Flask(__name__)
# Load the model and data from the pickle file
with open('hotel_recommender4_model.pkl', 'rb') as file:
    data = pickle.load(file)



# Connect to MongoDB
client = MongoClient('mongodb://localhost:27017/')
db = client['Hotel_Reservation']
collection = db['Price_Prediction']


model = data['model']
corr = data['corr']
mae = data['mae']
mse = data['mse']
r2 = data['r2_score']

@app.route('/')
def home():
    return render_template('result.html')


@app.route('/heatmap')
def heatmap():
        # Create a heatmap plot of the correlation matrix
    plt.figure(figsize=(10, 10))
    sns.heatmap(corr, annot=True, cmap='coolwarm')
    plt.title('Correlation Matrix')
    # Save the plot as a PNG image in memory
    buf = io.BytesIO()
    plt.savefig(buf, format='png')
    buf.seek(0)
    # Encode the image in base64 format for display in HTML
    heatmap = base64.b64encode(buf.read()).decode('utf-8')
    # Return the HTML page with the heatmap image and accuracy scores
    return render_template('heatmap.html', heatmap=heatmap, mae=mae, mse=mse, r2=r2)


@app.route('/predict', methods=['POST', 'GET'])
def predict():
    int_features = [int(x) for x in request.form.values()]
    final = np.array([int_features])
    prediction = model.predict(final)
    # print(int_features)

    # message = 'Successfully predicted price and results inserted into MongoDB!'
    # flash(message)

    int_features = {'company': int_features[0],
                    'lead_time': int_features[1],
                    'arrival_date_week_number': int_features[2],
                    'arrival_date_day_of_month': int_features[3],
                    'stays_in_week_nights': int_features[4],
                    'agent': int_features[5],
                    'market_segment_Corporate': int_features[6],
                    'distribution_channel_Corporate': int_features[7],
                    'price_prediction': prediction[0],
                    'r2_score': r2,
                    'mae': mae,
                    'mse': mse
                    }

    db.Price_Prediction.insert_one(int_features)
    # add alert successfully inserted

    result_text = 'Recommended Hotel Price is {}, R2, {}, MAE {}, MSE{}<br>Successfully Inserted results into MongoDB!'.format(prediction, r2, mae, mse)
    result_html = Markup('<div style="white-space: pre-line;">{}</div>'.format(result_text))
    return render_template('result.html', prediction=result_html)



if __name__ == '__main__':
    app.run(port=5000, debug=True)
