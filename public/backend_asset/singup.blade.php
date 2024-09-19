<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background-image: url('https://example.com/book-background.jpg'); /* Replace with your book image URL */
        background-size: cover;
        background-position: center;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .register-container {
        background-color: rgba(255, 255, 255, 0.9);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.5);
        width: 300px;
        text-align: center;
    }

    .register-container h1 {
        margin-bottom: 20px;
        font-size: 24px;
        color: #333;
    }

    .register-container input[type="text"],
    .register-container input[type="email"],
    .register-container input[type="password"] {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .register-container input[type="submit"] {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        background-color: #5a67d8;
        border: none;
        border-radius: 5px;
        color: white;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .register-container input[type="submit"]:hover {
        background-color: #434190;
    }

    .register-container p {
        margin-top: 20px;
        font-size: 14px;
    }

    .register-container p a {
        color: #5a67d8;
        text-decoration: none;
    }

    .register-container p a:hover {
        text-decoration: underline;
    }
</style>
