from flask import Flask, jsonify, redirect, request, render_template
import pickle
import numpy as np
import pandas as pd
import seaborn as sns
import matplotlib.pyplot as plt
import io
import base64

app = Flask(__name__)
# Load the model and data from the pickle file
with open('hotel_recommender4_model.pkl', 'rb') as file:
    data = pickle.load(file)

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
    return render_template('result.html', prediction='Recommended Hotel Price is {}, R2, {}, MAE {}, MSE{}'.format(prediction[0], r2,mae, mse))

if __name__ == '__main__':
    app.run(port=5000, debug=True)
