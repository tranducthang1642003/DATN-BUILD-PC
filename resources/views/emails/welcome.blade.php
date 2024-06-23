<body>
    <table role="presentation" class="container">
        <tr>
            <td class="logo">
                <img src="{{ asset('image/logo.png') }}" alt="Logo" class="h-12" alt=""
                    style="width: 108px; max-width: 100%; height: auto;" />
            </td>
        </tr>
        <tr>
            <td class="info">
                <table role="presentation">
                    <tr>
                        <td class="info-title">
                            BUILD PC XIN CHÀO BẠN
                        </td>
                    </tr>
                    <tr>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class="provider-info">
                <table role="presentation">
                    <tr>
                        <td class="provider-details">
                            <h2>Xin chào Bạn </h2>
                            <ul>
                                <li>
                                    <span>Xin chào tài khoản: </span>
                                    <span> {{ $email }}</span>
                                </li>
                                <li>
                                    <span>Mã Đăng nhập của bản là </span>
                                    <span> {{ $token }}</span>
                                </li>
                            </ul>
                        </td>
                    </tr>
                </table>
                <div class="separator"></div>
            </td>
        </tr>
        <tr>
            <td class="footer">Build pc kích chào</td>
        </tr>
    </table>
</body>
<style>
    @font-face {
        font-family: fontBase;
    }

    body {
        margin: 0;
        padding: 0;
        font-family: 'fontBase', sans-serif;
        background-color: #fff;
    }

    .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 0;
        border-top: 20px solid #ffca31;
    }

    .logo {
        text-align: center;
        padding: 32px 0;
    }

    .info {
        padding: 0 40px;
        background-color: #fff;
        border-radius: 4px;
    }

    .info-title {
        text-align: center;
        color: #9b7d29;
        font-weight: 900;
        font-size: 18px;
        line-height: 156%;
    }

    .info-description {
        text-align: center;
        color: #5b616e;
        font-weight: 400;
        font-size: 16px;
        line-height: 24px;
        padding: 16px 0;
    }

    .provider-info {
        padding: 0 40px;
        font-size: 16px;
        font-weight: 400;
        line-height: 24px;
    }

    .provider-details h2 {
        font-weight: 900;
        color: rgba(91, 97, 110, 1);
        margin: 0;
    }

    .provider-details ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .provider-details li {
        padding: 4px 0;
        color: rgba(91, 97, 110, 1);
    }

    .separator {
        border-top: 1px solid rgba(203, 208, 214, 1);
        margin: 15px 0;
    }

    .footer {
        text-align: center;
        color: #9b7d29;
        font-weight: 600;
        font-size: 20px;
        line-height: 140%;
        padding: 20px 0;
    }
</style>
