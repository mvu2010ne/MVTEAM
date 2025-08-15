
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Reg Facebook | Minh Vũ</title>
  <style>
    body {
      background-color: #1a1a2e;
      color: white;
      font-family: Arial, sans-serif;
      padding: 20px;
    }

    .container {
      max-width: 600px;
      margin: auto;
      background-color: #16213e;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(0,0,0,0.5);
    }

    h1 {
      text-align: center;
      color: #00f7ff;
    }

    button {
      padding: 10px 20px;
      background-color: #00f7ff;
      color: black;
      font-weight: bold;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      display: block;
      margin: 20px auto;
    }

    pre {
      background-color: #0f3460;
      padding: 15px;
      border-radius: 8px;
      white-space: pre-wrap;
      word-wrap: break-word;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>API Facebook Account Reg</h1>
    <button onclick="callAPI()">Tạo Tài Khoản Facebook</button>
    <pre id="output">Ấn nút để lấy dữ liệu...</pre>
  </div>

  <script>
    async function callAPI() {
      const output = document.getElementById("output");
      output.textContent = "Đang gọi API...";
      try {
        const response = await fetch("https://anhcode.sbs/anhcode/api/facebook/regfb.php");
        if (!response.ok) throw new Error("Lỗi mạng hoặc API không phản hồi");
        const data = await response.json();
        output.textContent = JSON.stringify(data, null, 2);
      } catch (err) {
        output.textContent = "Lỗi: " + err.message;
      }
    }
  </script>
</body>
</html>
