<?php
// Load password from a file located outside web root
$passwordFile = __DIR__ . "/../../downloads.txt";
$correctPassword = trim(file_get_contents($passwordFile));

function handleDownload($fileUrl, $correctPassword) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['download']) && isset($_POST['password'])) {
        if (hash_equals($correctPassword, $_POST['password'])) {
            header("Location: $fileUrl");
            exit;
        } else {
            return "Incorrect password. Please try again.";
        }
    }
    return null;
}

$error1 = handleDownload("https://alp.sandiegolan.net/LAN-Server.7z", $correctPassword);
$error2 = handleDownload("https://alp.sandiegolan.net/Install-ALP.zip", $correctPassword);
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        body { text-align: center; margin: 0; padding: 0; }
        .top-strip { background-color: #008081; height: 25px; width: 100%; }
        tr.first-row { background-image: url('images/head-back.jpg'); background-size: cover; background-position: center; }
        tr.first-row td { text-align: center; padding: 30px 0; color: #fff; font-size: 35px; font-weight: bold; background-color: transparent; }
        tr.second-row { background-color: #008081; }
        tr.second-row a { text-decoration: none; color: #dedede; font-weight: bold; padding: 10px 20px; display: inline-block; }
        .dropdown { position: relative; display: inline-block; }
        .dropbtn { background-color: #008081; color: #dedede; border: none; cursor: pointer; font-weight: bold; }
        .dropdown-content { display: none; position: absolute; background-color: #008081; min-width: 160px; z-index: 1; }
        .dropdown-content a { color: #dedede; padding: 12px 16px; text-decoration: none; display: block; font-weight: bold; }
        .dropdown-content a:hover { background-color: #dedede; color: #008081; }
        .dropdown:hover .dropdown-content { display: block; }
        tr.content-row { background-color: #dedede; }
        table { border-collapse: collapse; width: 100%; }
        form { margin: 10px 0; }
    </style>
</head>
<body>

    <div class="top-strip"></div>

    <table>
        <tbody>
            <tr class="first-row">
                <td colspan="6">Automated LAN-Party</td>
            </tr>
            <tr class="second-row">
                <td colspan="6">
                    <a href="index.html">HOME</a> |
                    <a href="calendar.html">CALENDAR</a> |
                    <a href="tournaments.html">TOURNAMENTS & CHALLENGES</a> |
                    <a href="chat.html">CHAT</a> |
                    <a href="downloads.php">DOWNLOADS</a> |
                    <div class="dropdown">
                        <span class="dropbtn">SERVERS &#x25BC;</span>
                        <div class="dropdown-content">
                            <a href="servers.html">VIRTUAL MACHINES</a>
                            <a href="non_steam_servers.html">NON-STEAM SERVERS</a>
                            <a href="steam_servers.html">STEAM SERVERS</a>
                            <a href="server_browser.html">SERVER BROWSER</a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr class="content-row">
                <td colspan="6">
                    <br>
                    <table border="0">
                        <tbody>
                            <tr>
                                <td width="*"></td>
                                <td width="1000" style="text-align: left;">

                                    <h1>Downloads</h1>
                                    Upload Date: 07/16/2025

                                    <form method="post">
                                        <input type="password" name="password" placeholder="Enter password">
                                        <input type="hidden" name="download" value="lan-server">
                                        <button type="submit">Download LAN-Server.7z</button>
                                    </form>
                                    <?php if ($error1) echo "<p style='color:red;'>$error1</p>"; ?>

                                    <br>.7z includes the main file itself, including a readme, remote desktop shortcut and the .vhdx virtual hard drive.<br>
                                    Available currently to LANfest Chapters for beta testing upon request.<br><br>

                                    <form method="post">
                                        <input type="password" name="password" placeholder="Enter password">
                                        <input type="hidden" name="download" value="install-alp">
                                        <button type="submit">Download Install-ALP.zip</button>
                                    </form>
                                    <?php if ($error2) echo "<p style='color:red;'>$error2</p>"; ?>

                                    <br>
                                    <a href="https://www.patreon.com/SanDiegoLAN">Patron supporters</a> will receive the download password if you want immediate access and help us out
                                    <br><br>

                                    <script src="https://www.paypalobjects.com/donate/sdk/donate-sdk.js" charset="UTF-8"></script>
                                    <script>
                                    PayPal.Donation.Button({
                                        env:'production',
                                        hosted_button_id:'FA2FDCJ73PRLS',
                                        image: {
                                            src:'https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif',
                                            alt:'Donate with PayPal button',
                                            title:'PayPal - The safer, easier way to pay online!'
                                        }
                                    }).render('#donate-button');
                                    </script>

                                    <br>
                                    Slow or disconnecting downloads? Try <a href="https://freedownloadmanager.org/" target="_blank">https://freedownloadmanager.org/</a><br><br>

                                    For installation instructions on building the VM in Windows Hyper-V visit <a href="servers.html">Servers</a><br><br>

                                    <h4>If you're looking to add a new download to your existing ALP installation:</h4>
                                    <br>
                                    To add a download, copy a file into C:\wamp64\www\wp-content\uploads\download-manager-files<br>
                                    Then add new file or duplicate an existing file within the downloads admin:<br>
                                    http://lan-server/wp-admin/edit.php?post_type=wpdmpro<br>
                                    Name the file and URL ending you wish to use.<br>
                                    Choose "Select from server" on the right and browse to the file.<br>
                                    Select your file group, either games or programs on the right.<br>
                                    Choose your file version number at the bottom<br>
                                    Publish / update on the middle right.<br>

                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/AVGbv2vqA2o?si=obEfFq3-z0CM1eO9&amp;start=35" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

                                </td>
                                <td width="*"></td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="top-strip"></div>
</body>
</html>
