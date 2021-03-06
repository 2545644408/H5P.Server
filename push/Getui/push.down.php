<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
		<title>下载通知 - 个推</title>
        <script type="text/javascript" charset="utf-8">
function checkSubmit() {
    var cid = document.getElementById('cid');
    if ( !cid.value || cid.value=="" ) {
        alert( "无效终端标识！" );
        cid.focus();
        return false;
    }
    var content = document.getElementById('content');
    if ( !content.value || content.value=="" ) {
        alert( "无效内容！" );
        content.focus();
        return false;
    }
    var durl = document.getElementById('durl');
    if ( !durl.value || durl.value=="" ) {
        alert( "无效下载链接地址！" );
        durl.focus();
        return false;
    }
    return true;
}
        </script>
		<style type="text/css">
.des{
	color: blue;
	font-size: 0.5em;
	margin:0 10px 10px 0;
}
.important{
	color: red;
	font-weight: bolder;
}
.tips{
	color: red;
}
.paragraph{
	text-indent: 2em;
}
		</style>
	</head>
	<body>
		<form action="./push.php" method="POST" onsubmit="return checkSubmit()">
        <input type="hidden" name="pushtype" value="down"/>
<?php
    if ( isset($_GET['version']) ) {
        echo( '<input type="hidden" name="version" value="'.$_GET['version'].'"/>' );
    }
    if ( isset($_GET['appid']) ) {
        echo( '<input type="hidden" name="appid" value="'.$_GET['appid'].'"/>' );
    }
?>
		<table>
			<tbody>
				<tr>
					<td style="">终端标识:</td>
					<!-- readonly="readonly" placeholder="推送通知终端标识" -->
					<td>
						<input id="cid" name="cid" type="text" style="width:100%" placeholder="推送终端标识"
<?php
    if ( isset($_GET['cid']) ) {
        echo( "readonly=\"readonly\" value=\"{$_GET['cid']}\"" );
    }
?>
						/><br/>
                    </td>
				</tr>
				<tr>
					<td></td>
					<td>
						<p class="des">
	[必填]，个推平台设备标识ClientId(cid)，接收推送消息终端设备的唯一标识，在5+ API中可通过plus.push.getClientInfo().clientid获取。
						</p>
					</td>
				</tr>
				<tr>
					<td >Token(APN):</td>
					<td>
						<input id="token" name="token" type="text" style="width:100%" placeholder="iOS APN推送设备Token"
<?php
	if ( isset($_GET['token']) ) {
		echo( "readonly=\"readonly\" value=\"{$_GET['token']}\"" );
	}
?>
						/>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<p class="des">
	[选填]，iOS APNS设备标识Token，接收APNS消息终端设备的唯一标识，在5+ API中可通过plus.push.getClientInfo().token获取。<br/>
	<span class="important">仅iOS平台支持，未设置token则不通过APNS通道推送离线消息</span>
						</p>
					</td>
				</tr>
				<tr>
					<td colspan="2"><hr></td>
				</tr>
				<tr>
					<td>标题:</td>
					<td><input id="title" name="title" type="text" style="width:100%" placeholder="下载推送通知的标题"<?php
if ( isset($_GET['title']) ) {
    echo( " value=\"{$_GET['title']}\"" );
}
?>/></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<p class="des">
	[选填]，推送消息的标题，未设置则使用默认标题。<br/>
						</p>
					</td>
				</tr>
				<tr>
					<td>内容:</td>
					<td><textarea id="content" name="content" style="width:100%" rows="3" placeholder="下载推送通知的内容"><?php
if ( isset($_GET['content']) ) {
    echo( $_GET['content'] );
}else{
	echo( '下载推送通知的内容' );
}
?></textarea></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<p class="des">
	[必填]，推送消息的内容。<br/>
						</p>
					</td>
				</tr>
                <tr>
                    <td colspan="2"><hr></td>
                </tr>
				<tr>
					<td>提示标题：</td>
					<td><input id="ptitle" name="ptitle" type="text" style="width:100%" placeholder="下载提示框的标题"
<?php
if ( isset($_GET['ptitle']) ) {
    echo( "value=\"{$_GET['ptitle']}\"" );
}
?>
                    /></td>
				</tr>
                <tr>
                    <td></td>
                    <td>
                        <p class="des">
    [选填]，确认下载提示框显示的标题，未设置则使用默认标题。<br/>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>提示内容：</td>
                    <td><textarea id="pcontent" name="pcontent" rows="3" style="width:100%" placeholder="下载提示框的内容"><?php
if ( isset($_GET['pcontent']) ) {
    echo( $_GET['pcontent'] );
}else{
    echo( '下载提示框的内容' );
}
                    ?></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <p class="des">
    [必填]，确认下载提示框显示的内容。<br/>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><hr></td>
                </tr>
                <tr>
                    <td>下载框标题：</td>
                    <td><input id="dtitle" name="dtitle" type="text" style="width:100%" placeholder="下载进度框的标题"
<?php
if ( isset($_GET['dtitle']) ) {
    echo( " value=\"{$_GET['dtitle']}\"" );
}
?>
                    /></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <p class="des">
    [选填]，下载进度提示框显示的标题，未设置则使用默认标题。<br/>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>下载资源地址：</td>
                    <td><input id="durl" name="durl" type="url" style="width:100%" placeholder="下载资源的链接地址"
<?php
if ( isset($_GET['durl']) ) {
    echo( " value=\"{$_GET['durl']}\"" );
}
?>
                    /></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <p class="des">
    [必填]，下载资源的链接地址。<br/>
                        </p>
                    </td>
                </tr>
				<tr>
					<td colspan="2" style="text-align:center;">
						<input type="submit" value="发送推送通知"/>
					</td>
				</tr>
			</tbody>
		</table>
		</form>
        <section class="tips">
        <h2>Android</h2>
        <p class="paragraph">
    不管应用在线还是离线，在系统通知栏中显示消息，点击消息后弹出下载确认提示框（显示下载提示信息），点击“下载”按钮开始下载资源，并在系统通知栏中显示下载进度。
        </p>
        <h2>iOS</h2>
        <p class="paragraph">
    应用在线：暂不支持下载通知，客户端接收到此消息后不处理。
        </p>
        <p class="paragraph">
    应用离线：如果设置Token值则通过APN推送离线信息，成功后在系统通知栏中显示消息，点击消息后启动应用（如果已经启动则从后台切换到前台），同时触发“click”事件，此时可通过js处理透传数据。如果没有设置Token值则在应用启动后通过应用在线模式推送通知。
        </p>
        </section>
	</body>
</html>
