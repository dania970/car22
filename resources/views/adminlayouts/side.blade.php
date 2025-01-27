


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: white;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .menu-item {
            margin-bottom: 15px;
        }

        .menu-link {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: #727272;
            font-size: 16px;
            padding: 8px;
            transition: color 0.3s;
        }

        .menu-link:hover {
            color: #333;
        }

        .menu-link i {
            font-size: 18px;
            width: 24px;
            text-align: center;
        }

        .logout-section {
            margin-top: auto;
        }

        /* Font settings for Arabic text */
        body {
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <ul class="sidebar-menu">
            <li class="menu-item">
                                    <a href="{{ route('admin.dashboard') }}"
 class="menu-link">
                    <i class="fas fa-home"></i>
                    الرئيسية
                </a>
            </li>
            <li class="menu-item">
                                <a href="{{ route('admin.category') }}"
 class="menu-link">
                    <i class="fas fa-tags"></i>
                    التصنيفات
                </a>
            </li>
            <li class="menu-item">
                                  <a href="{{ route('admin.cars') }}"
 class="menu-link">

                    <i class="fas fa-car"></i>
                    السيارات
                </a>
            </li>
            <li class="menu-item">
                                    <a href="{{ route('admin.contacts') }}"
class="menu-link">

                    <i class="fas fa-envelope"></i>
                    البريد الوارد
                </a>
            </li>
        </ul>
        
        <div class="logout-section">
                           <a href="{{ route('login') }}"
 class="menu-link">

                <i class="fas fa-sign-out-alt"></i>
                تسجيل الخروج
            </a>
        </div>
    </div>
