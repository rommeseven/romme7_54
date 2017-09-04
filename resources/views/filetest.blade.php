<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Test</title>
</head>
<body>
	<form action="fileuploadtest" enctype="multipart/form-data" method="post">
	{{ csrf_field() }}
		
		<input type="file" name="avatar" id="avatar" />

		<input type="submit" value="Upload" />

	</form>


	<img src="{{   Cloudder::secureShow("avatars/rusmC3pfXkJ4m6qc7cTJ54vZlFG48gRhzYX2vCDf.jpeg") }}" alt="" />
</body>
</html>