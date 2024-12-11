<?php
function getDashboardPage()
{
    // Errornya biarkan, karena aslinya variabel ini
    switch ($session->get('level')) {
        case '1':
            $page = '../dashboard/dashboard-admin.php';
            return $page;
        case '2':
            $page = '../dashboard/dashboard-admin.php';
            return $page;
        case '3':
            $page = '../dashboard/dashboard-admin.php';
            return $page;
        case '4':
            $page = '../dashboard/dashboard-admin.php';
            return $page;
        default:
            break;
    }
}
?>

<div id="sidebar" class="sidebar">
    <div class="sidebar-logo">
        <img src="../../assets/icon/logo_polinema.png" alt="LogoPolinema">
        <p>Politeknik Negeri Malang</p>
    </div>
    <ul class="sidebar-menu">
        <li class="sidebar-nav">
            <div class="circle-outside">
                <div class="circle-inside">
                    <a href="../dashboard/dashboard-admin.php"><img src="../../assets/icon/house-icon.svg" alt=""> <span>Home</span></a>
                </div>
            </div>
        </li>
        <li class="sidebar-nav">
            <div class="circle-outside">
                <div class="circle-inside">
                    <a href="../report/report.php"><img src="../../assets/icon/warning-icon.svg" alt=""><span>Report</span></a>
                </div>
            </div>
        </li>
        <li class="sidebar-nav">
            <div class="circle-outside">
                <div class="circle-inside">
                    <a href="history"><img src="../../assets/icon/history-icon.svg" alt=""><span>History</span></a>
                </div>
            </div>
        </li>
        <li class="sidebar-nav" style="display: <?= ($_SESSION['level'] == 1) ? 'block' : 'none'; ?>;">
            <div class="circle-outside">
                <div class="circle-inside">
                    <a href="../manajemen-user/manajemen-user.php"><img src="../../assets/icon/user-list-icon.svg" alt=""><span>Manajemen User</span></a>
                </div>
            </div>
        </li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li><a href="../../action/auth.php?act=logout"><img src="../../assets/icon/log-out-icon.svg" alt=""><span>Log Out</span></a></li>
    </ul>
</div>