

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Gửi NGL Ẩn Danh</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { font-family: sans-serif; background: #f4f4f4; padding: 20px; }
        .container { max-width: 500px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2 { text-align: center; }
        input, textarea, select, button {
            width: 100%; padding: 10px; margin: 10px 0; border-radius: 5px; border: 1px solid #ccc;
        }
        button { background: #007BFF; color: white; border: none; cursor: pointer; }
        button:hover { background: #0056b3; }
        .result { background: #e7f3fe; padding: 10px; border-left: 4px solid #2196F3; margin-top: 15px; white-space: pre-line; }
        .error { background: #fdecea; border-left: 4px solid #f44336; color: #d8000c; padding: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>💬 Gửi Tin Nhắn Ẩn Danh NGL</h2>
        <form method="post">
            <input type="text" name="username" placeholder="Tên người nhận (username)" required>
            <textarea name="question" placeholder="Câu hỏi hoặc tin nhắn" rows="5" required></textarea>
            <input type="number" name="threads" placeholder="Số lần gửi" max="25" required>
            <select name="emoji">
                <option value="yes">Thêm Emoji</option>
                <option value="no">Không thêm Emoji</option>
            </select>
            <button type="submit">🚀 Gửi ngay</button>
        </form>

        
            </div>
</body>
</html>
