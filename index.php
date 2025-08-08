<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>安全页面 放心访问</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', 'PingFang SC', 'Microsoft YaHei', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: #333;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 480px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            position: relative;
            transition: transform 0.3s ease;
        }

        .container:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 50px rgba(37, 117, 252, 0.3);
        }

        .header {
            background: linear-gradient(135deg, #4e6ef2, #8a2be2);
            color: white;
            padding: 50px 20px 35px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 180px;
            height: 180px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            z-index: 1;
        }

        .header::after {
            content: '';
            position: absolute;
            bottom: -40px;
            left: -40px;
            width: 140px;
            height: 140px;
            background: rgba(255, 255, 255, 0.07);
            border-radius: 50%;
            z-index: 1;
        }

        .logo-container {
            position: relative;
            width: 110px;
            height: 110px;
            margin: 0 auto 25px;
            z-index: 3;
        }

        .logo {
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(8px);
            border: 2px solid rgba(255, 255, 255, 0.25);
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2), inset 0 0 15px rgba(255, 255, 255, 0.3);
        }

        .logo img {
            width: 65px;
            height: 65px;
            object-fit: cover;
            border-radius: 50%;
            transition: transform 0.4s ease;
        }

        .logo-shine {
            position: absolute;
            top: -15px;
            left: -15px;
            width: 140px;
            height: 140px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.4) 0%, transparent 70%);
            border-radius: 50%;
            z-index: 1;
            pointer-events: none;
            animation: pulse 4s infinite ease-in-out;
        }

        .logo-container:hover .logo {
            transform: scale(1.08) rotate(5deg);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3), inset 0 0 20px rgba(255, 255, 255, 0.4);
        }

        .logo-container:hover .logo img {
            transform: scale(1.1);
        }

        h1 {
            font-size: 30px;
            font-weight: 700;
            margin-bottom: 12px;
            z-index: 3;
            position: relative;
            text-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            letter-spacing: 1px;
        }

        .subtitle {
            font-size: 17px;
            opacity: 0.95;
            max-width: 320px;
            margin: 0 auto;
            line-height: 1.6;
            z-index: 3;
            position: relative;
            letter-spacing: 3px;
            font-weight: 500;
        }

        .content {
            padding: 40px 30px 30px;
            position: relative;
        }

        .loading-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 25px;
            margin: 10px 0 30px;
        }

        .loading-spinner {
            width: 60px;
            height: 60px;
            border: 5px solid rgba(78, 110, 242, 0.1);
            border-top: 5px solid #4e6ef2;
            border-radius: 50%;
            animation: spin 1.2s linear infinite;
            z-index: 2;
            position: relative;
        }

        .loading-spinner::after {
            content: '';
            position: absolute;
            top: -8px;
            left: -8px;
            right: -8px;
            bottom: -8px;
            border: 2px solid rgba(78, 110, 242, 0.05);
            border-radius: 50%;
        }

        .loading-text {
            font-size: 18px;
            font-weight: 500;
            color: #555;
        }

        .progress-container {
            width: 100%;
            max-width: 320px;
            margin-top: 15px;
        }

        .progress-bar {
            width: 100%;
            height: 10px;
            background: #eef2f7;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .progress {
            height: 100%;
            width: 0%;
            background: linear-gradient(90deg, #4e6ef2, #8a2be2);
            border-radius: 5px;
            transition: width 0.4s ease-out;
            box-shadow: 0 2px 10px rgba(78, 110, 242, 0.3);
        }

        .security-info {
            background: linear-gradient(to bottom, #f8f9fc, #eef2f7);
            border-radius: 18px;
            padding: 30px;
            margin-top: 30px;
            border: 1px solid #e1e6f0;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            position: relative;
            overflow: hidden;
        }

        .security-info::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #4e6ef2, #8a2be2);
        }

        .security-title {
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 20px;
            font-weight: 600;
            color: #4e6ef2;
            margin-bottom: 25px;
        }

        .security-title i {
            font-size: 24px;
            background: rgba(78, 110, 242, 0.1);
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .security-features {
            display: grid;
            grid-template-columns: 1fr;
            gap: 18px;
        }

        .feature {
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 16px;
            color: #555;
            padding: 12px 15px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.03);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .feature:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .feature i {
            color: #10b981;
            font-size: 20px;
            min-width: 30px;
            background: rgba(16, 185, 129, 0.1);
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .error-container {
            display: none;
            background: linear-gradient(to bottom, #fff0f0, #ffeaea);
            border-radius: 18px;
            padding: 35px 25px;
            text-align: center;
            margin-top: 30px;
            border: 1px solid #ffd6d6;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }

        .error-icon {
            font-size: 50px;
            color: #ef4444;
            margin-bottom: 25px;
            animation: shake 0.5s ease-in-out;
        }

        .error-title {
            font-size: 24px;
            font-weight: 700;
            color: #ef4444;
            margin-bottom: 15px;
        }

        .error-message {
            font-size: 16px;
            color: #777;
            line-height: 1.7;
            margin-bottom: 30px;
        }

        .contact-btn {
            display: inline-block;
            background: linear-gradient(135deg, #4e6ef2, #8a2be2);
            color: white;
            padding: 14px 35px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
            box-shadow: 0 6px 20px rgba(78, 110, 242, 0.4);
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .contact-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: 0.5s;
        }

        .contact-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(78, 110, 242, 0.5);
        }

        .contact-btn:hover::before {
            left: 100%;
        }

        .contact-btn i {
            margin-right: 10px;
        }

        footer {
            text-align: center;
            padding: 30px 20px;
            color: #777;
            font-size: 14px;
            border-top: 1px solid #eee;
            display: flex;
            justify-content: center;
            background: #fafbfd;
        }

        .contact-footer {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: #f0f4ff;
            border-radius: 50px;
            padding: 10px 25px;
            font-size: 14px;
            color: #4e6ef2;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 1px solid #e1e8ff;
            font-weight: 500;
        }

        .contact-footer:hover {
            background: #4e6ef2;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(78, 110, 242, 0.3);
        }

        .contact-footer i {
            font-size: 16px;
        }

        iframe {
            border: none;
            width: 100vw;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            opacity: 0;
            transition: opacity 0.4s;
            z-index: 100;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes pulse {
            0% { opacity: 0.3; transform: scale(0.95); }
            50% { opacity: 0.5; transform: scale(1); }
            100% { opacity: 0.3; transform: scale(0.95); }
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            20%, 60% { transform: translateX(-8px); }
            40%, 80% { transform: translateX(8px); }
        }

        @media (max-width: 480px) {
            .container {
                border-radius: 16px;
            }
            
            .header {
                padding: 40px 15px 30px;
            }
            
            .content {
                padding: 30px 20px 25px;
            }
            
            .logo-container {
                width: 90px;
                height: 90px;
            }
            
            .logo img {
                width: 50px;
                height: 50px;
            }
            
            h1 {
                font-size: 26px;
            }
            
            .security-info {
                padding: 25px 20px;
            }
            
            .security-title {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo-container">
                <div class="logo-shine"></div>
                <div class="logo">
                    <img src="https://z.wiki/u/UtY5mi" alt="安全盾牌图标">
                </div>
            </div>
            <h1>安全页面 放心访问</h1>
            <p class="subtitle">安全插入</p>
        </div>
        
        <div class="content">
            <div class="loading-container">
                <div class="loading-spinner"></div>
                <div class="loading-text">正在建立安全连接...</div>
                <div class="progress-container">
                    <div class="progress-bar">
                        <div class="progress" id="progress"></div>
                    </div>
                </div>
            </div>
            
            <div class="security-info">
                <div class="security-title">
                    <i class="fas fa-lock"></i>
                    <span>当前安全状态</span>
                </div>
                <div class="security-features">
                    <div class="feature">
                        <i class="fas fa-check-circle"></i>
                        <span>TLS 1.3 加密已启用</span>
                    </div>
                    <div class="feature">
                        <i class="fas fa-check-circle"></i>
                        <span>验证通过</span>
                    </div>
                    <div class="feature">
                        <i class="fas fa-check-circle"></i>
                        <span>数据完整性保护</span>
                    </div>
                    <div class="feature">
                        <i class="fas fa-check-circle"></i>
                        <span>访问控制已启用</span>
                    </div>
                </div>
            </div>
            
            <div class="error-container" id="errorContainer">
                <div class="error-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <h2 class="error-title">访问被拒绝</h2>
                <p class="error-message">您请求的域名未在白名单中无法访问</p>
                <a href="https://t.me/ag77777y" class="contact-btn">
                    <i class="fab fa-telegram"></i>域名加白点击此处
                </a>
            </div>
        </div>
        
        <footer>
            <a href="https://t.me/ag77777y" class="contact-footer">
                <i class="fab fa-telegram"></i>域名加白请联系: tg@ag77777y
            </a>
        </footer>
    </div>

    <script>
        // 域名白名单列表 - 只有这些域名允许访问
        const WHITELISTED_DOMAINS = [
            "example.com",
            "xinshi.icu",
            "wqaxb.fun",
            "hvghjbv.com.cn"
        ];

        document.addEventListener('DOMContentLoaded', async () => {
            const progressBar = document.getElementById('progress');
            const errorContainer = document.getElementById('errorContainer');
            
            // 模拟进度条加载效果
            let progress = 0;
            const progressInterval = setInterval(() => {
                progress += Math.random() * 12;
                if (progress >= 100) {
                    progress = 100;
                    clearInterval(progressInterval);
                }
                progressBar.style.width = progress + '%';
            }, 180);
            
            try {
                const urlParams = new URLSearchParams(window.location.search);
                const encodedParam = urlParams.get('goofish');
                
                if (!encodedParam) {
                    throw new Error('ACCESS_DENIED');
                }

                const targetUrl = decodeURIComponent(atob(encodedParam));
                
                // 检查URL格式是否有效
                if (!targetUrl.startsWith('http')) {
                    throw new Error('ACCESS_DENIED');
                }
                
                // 提取目标URL的域名
                let targetDomain;
                try {
                    const urlObj = new URL(targetUrl);
                    targetDomain = urlObj.hostname;
                    
                    // 移除www前缀（如果存在）进行标准化
                    targetDomain = targetDomain.replace(/^www\./i, '');
                } catch (e) {
                    throw new Error('ACCESS_DENIED');
                }
                
                // 检查域名是否在白名单中
                let isAllowed = false;
                for (const domain of WHITELISTED_DOMAINS) {
                    // 检查精确匹配或子域名
                    if (targetDomain === domain || 
                        targetDomain.endsWith(`.${domain}`)) {
                        isAllowed = true;
                        break;
                    }
                }
                
                if (!isAllowed) {
                    throw new Error('ACCESS_DENIED');
                }

                // 尝试从URL参数获取标题
                const encodedTitle = urlParams.get('title');
                if (encodedTitle) {
                    document.title = decodeURIComponent(atob(encodedTitle));
                }

                // 创建并插入iframe
                const iframe = document.createElement('iframe');
                iframe.src = targetUrl;
                iframe.allow = 'same-origin';
                document.body.appendChild(iframe);
                
                // 添加加载完成处理
                iframe.onload = function() {
                    setTimeout(() => {
                        iframe.style.opacity = '1';
                    }, 300);
                };
                
                // 绑定鼠标滚轮事件（原功能）
                if (iframe) {
                    bindMouseWheel(iframe);
                }
            } catch (e) {
                // 错误处理
                clearInterval(progressInterval);
                progressBar.style.width = '100%';
                
                // 仅当访问被拒绝时才显示错误容器
                if (e.message === 'ACCESS_DENIED') {
                    setTimeout(() => {
                        errorContainer.style.display = 'block';
                    }, 400);
                }
                
                console.error('访问错误:', e.message);
            }
        });

        // 原功能 - 鼠标滚轮事件绑定
        const isFirefox = navigator.userAgent.includes('Firefox');

        function bindMouseWheel(iframe) {
            try {
                const doc = iframe.contentWindow.document;
                const handleWheel = (e) => {
                    e.preventDefault();
                    const delta = isFirefox ? e.detail * -50 : e.wheelDelta;
                    doc.documentElement.scrollTop += delta;
                };

                doc.addEventListener(isFirefox ? 'DOMMouseScroll' : 'wheel', handleWheel);
            } catch (e) {
                console.warn('鼠标滚轮事件绑定失败:', e.message);
            }
        }
    </script>
</body>
</html>
