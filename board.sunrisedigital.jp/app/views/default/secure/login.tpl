<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Secure Login</title>
	</head>
	<body>
		{if $failed}<p>IDかパスワードが違います。</p>{/if}
		{$form->renderStartTag() nofilter}
			<dl>
				<dt>ID</dt>
				<dd>
					{$form.login_id->render() nofilter}
					{$form.login_id->renderError() nofilter}
				</dd>
				<dt>Password</dt>
				<dd>
					{$form.password->render() nofilter}
					{$form.password->renderError() nofilter}
				</dd>
			</dl>
			<div>{$form[$auto_login_cookie]->setLabel("Auto Login")->renderWithLabel() nofilter}</div>
			<div>
				<input type="submit" name="submit" name="Login" class="submit" />
			</div>
		</form>
	</body>
</html>