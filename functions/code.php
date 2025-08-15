
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Sản phẩm mã nguồn- tool</title>
  <style>
    body {
      background-color: #1a1a2e;
      color: white;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 800px;
      margin: auto;
      padding: 20px;
    }

    .section-title {
      font-size: 24px;
      font-weight: bold;
      color: #fff;
      text-align: center;
      margin-bottom: 20px;
    }

    .product-card {
      background-color: #2c2c3e;
      border-radius: 10px;
      padding: 16px;
      margin: 20px auto;
      width: 100%;
      box-shadow: 0 4px 10px rgba(0,0,0,0.5);
      text-align: center;
      position: relative;
      transition: transform 0.3s ease;
    }

    .product-card.hot {
      border: 2px solid #ff4d4d;
      animation: pulse 1.5s infinite;
    }

    @keyframes pulse {
      0% { transform: scale(1); }
      50% { transform: scale(1.01); }
      100% { transform: scale(1); }
    }

    .product-card img {
      width: 100%;
      border-radius: 10px;
    }

    .tags, .meta {
      display: flex;
      justify-content: center;
      gap: 8px;
      margin-top: 8px;
      flex-wrap: wrap;
    }

    .tag {
      background-color: #4b4b6b;
      padding: 4px 8px;
      border-radius: 5px;
      font-size: 12px;
    }

    .download-btn {
      margin-top: 14px;
      background-color: #4f46e5;
      color: white;
      padding: 10px 16px;
      border: none;
      border-radius: 8px;
      text-decoration: none;
      font-weight: bold;
      display: inline-block;
      cursor: pointer;
    }

    .download-btn:hover {
      background-color: #4338ca;
    }

    .views {
      position: absolute;
      top: 10px;
      right: 10px;
      background: #5b4dff;
      padding: 4px 10px;
      border-radius: 10px;
      font-size: 12px;
    }

    .free-badge {
      position: absolute;
      top: 10px;
      left: 10px;
      background: red;
      color: white;
      padding: 4px 6px;
      font-size: 10px;
      border-radius: 5px;
    }

    .image-wrapper {
      position: relative;
    }

    .downloads-count {
      margin-top: 6px;
      font-size: 13px;
      color: #ccc;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="section-title">🔥 Các sản phẩm được đề cử</div>

    <!-- Sản phẩm 1 (hot) -->
    <div class="product-card hot" id="product1">
      <div class="image-wrapper">
        <span class="free-badge">FREE</span>
        <img src="https://anhcode.sbs/img/qen1Lsi.png" alt="Anh Code">
      </div>
      <div class="meta">
        <span class="tag">📅 1-8-2035</span>
        <span class="tag">🔧 1.0.1</span>
      </div>
      <h3>Share source phòng bar tiktok version 1</h3>
      <div class="tags">
        <span class="tag">Source Free</span>
        <span class="tag">HTML</span>
        <span class="tag">JavaScript</span>
      </div>
      <button class="download-btn" onclick="handleDownload('product1', 'https://yeumoney.com/alip2tMT')">Tải xuống</button>
      <div class="downloads-count" id="downloads-product1">Đã tải: 0 lượt</div>
    </div>

    <!-- Sản phẩm 2 -->
    <div class="product-card" id="product2">
      <div class="image-wrapper">
        <span class="free-badge">FREE</span>
        <img src="https://anhcode.sbs/img/d1YXPVQ.png" alt="Anh Code">
      </div>
      <div class="meta">
        <span class="tag">📅 1-8-2025</span>
        <span class="tag">🔧 1.0.0</span>
      </div>
      <h3>Code Game Người Que Báo Thù</h3>
      <div class="tags">
        <span class="tag">Source Free</span>
        <span class="tag">Html</span>
        <span class="tag">JavaScript</span>
      </div>
      <button class="download-btn" onclick="handleDownload('product2', 'https://yeumoney.com/HoBUy_fw')">Tải xuống</button>
      <div class="downloads-count" id="downloads-product2">Đã tải: 0 lượt</div>
    </div>
    
    <!-- Sản phẩm 3-->
    <div class="product-card" id="product3">
      <div class="image-wrapper">
        <span class="free-badge">FREE</span>
        <img src="https://anhcode.sbs/img/giai-cuu-neverland-200.jpg" alt="Anh Code">
      </div>
      <div class="meta">
        <span class="tag">📅 1-8-2025</span>
        <span class="tag">🔧 1.0.0</span>
      </div>
      <h3>Code Giải Cứu Neverland</h3>
      <div class="tags">
        <span class="tag">Source Free</span>
        <span class="tag">Html</span>
        <span class="tag">JavaScript</span>
      </div>
      <button class="download-btn" onclick="handleDownload('product3', 'https://yeumoney.com/93ICKt5PLgs')">Tải xuống</button>
      <div class="downloads-count" id="downloads-producte3">Đã tải: 0 lượt</div>
    </div>
    <!-- Sản phẩm 4-->
    <div class="product-card" id="product4">
      <div class="image-wrapper">
        <span class="free-badge">FREE</span>
        <img src="https://anhcode.sbs/img/maxresdefault.jpg" alt="Anh Code">
      </div>
      <div class="meta">
        <span class="tag">📅 1-8-2025</span>
        <span class="tag">🔧 1.0.0</span>
      </div>
      <h3>Code Game Bắn Cá</h3>
      <div class="tags">
        <span class="tag">Source Free</span>
        <span class="tag">Html</span>
        
      </div>
      <button class="download-btn" onclick="handleDownload('product4', 'https://yeumoney.com/5Egv5Bq')">Tải xuống</button>
      <div class="downloads-count" id="downloads-producte4">Đã tải: 0 lượt</div>
    </div>
    <!-- Sản phẩm 5-->
    <div class="product-card" id="product5">
      <div class="image-wrapper">
        <span class="free-badge">FREE</span>
        <img src="https://anhcode.sbs/img/xuk4RMF.png" alt="Anh Code">
      </div>
      <div class="meta">
        <span class="tag">📅 1-8-2025</span>
        <span class="tag">🔧 1.0.0</span>
      </div>
      <h3>Client BOX Game tương tác tiktok version 1.0.0.1</h3>
      <div class="tags">
        <span class="tag">Source Free</span>
        <span class="tag">Game</span>
        
      </div>
      <button class="download-btn" onclick="handleDownload('product5', 'https://yeumoney.com/_ihj7G')">Tải xuống</button>
      <div class="downloads-count" id="downloads-producte5">Đã tải: 0 lượt</div>
    </div>
    <!-- Sản phẩm 6-->
    <div class="product-card" id="product6">
      <div class="image-wrapper">
        <span class="free-badge">FREE</span>
        <img src="https://anhcode.sbs/img/gSEo52S.png" alt="Anh Code">
      </div>
      <div class="meta">
        <span class="tag">📅 1-8-2025</span>
        <span class="tag">🔧 1.0.0</span>
      </div>
      <h3>Tiktok game onepiece tương tác với livestream</h3>
      <div class="tags">
        <span class="tag">Source Free</span>
        <span class="tag">Game</span>
        
      </div>
      <button class="download-btn" onclick="handleDownload('product6', 'https://yeumoney.com/NWi5u2Drr5')">Tải xuống</button>
      <div class="downloads-count" id="downloads-producte6">Đã tải: 0 lượt</div>
    </div>
    <!-- Sản phẩm 7-->
    <div class="product-card" id="product7">
      <div class="image-wrapper">
        <span class="free-badge">FREE</span>
        <img src="https://anhcode.sbs/img/dai-dich-zombie-200.jpg" alt="Anh Code">
      </div>
      <div class="meta">
        <span class="tag">📅 1-8-2025</span>
        <span class="tag">🔧 1.0.0</span>
      </div>
      <h3>Source game html5 Đại dịch zombie</h3>
      <div class="tags">
        <span class="tag">Source Free</span>
        <span class="tag">Php</span>
        <span class="tag">JavaScript</span>
        <span class="tag">Game</span>
      </div>
      <button class="download-btn" onclick="handleDownload('product7', 'https://yeumoney.com/zjLdzMy')">Tải xuống</button>
      <div class="downloads-count" id="downloads-producte7">Đã tải: 0 lượt</div>
    </div>
    <!-- Sản phẩm 8-->
    <div class="product-card" id="product8">
      <div class="image-wrapper">
        <span class="free-badge">FREE</span>
        <img src="https://anhcode.sbs/img/fzIAHl0.png" alt="Anh Code">
      </div>
      <div class="meta">
        <span class="tag">📅 1-8-2025</span>
        <span class="tag">🔧 1.0.0</span>
      </div>
      <h3>Share source tool trao đổi sub python free</h3>
      <div class="tags">
        <span class="tag">Source Free</span>
        <span class="tag">Python</span>
      </div>
      <button class="download-btn" onclick="handleDownload('product8', 'https://yeumoney.com/njtYt')">Tải xuống</button>
      <div class="downloads-count" id="downloads-producte8">Đã tải: 0 lượt</div>
    </div>
    
  </div>

  <script>
    const downloadCounts = {
      product1: 0,
      product2: 0
    };

    function handleDownload(productId, downloadURL) {
      downloadCounts[productId]++;
      const countElement = document.getElementById('downloads-' + productId);
      countElement.textContent = `Đã tải: ${downloadCounts[productId]} lượt`;
      window.open(downloadURL, '_blank');
    }
  </script>
</body>
</html>
