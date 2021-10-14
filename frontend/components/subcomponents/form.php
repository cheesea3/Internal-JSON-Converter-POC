<form method="POST" name="fileupload" x-data="upload()" id="fileupload" enctype="multipart/form-data">
			<script>
			window.handleReset = function() {
				document.getElementById('addFile').value = "";
				document.getElementById('fileupload').__x.$data.files = null;
			}
			const upload = () => {
				return {
					files: null,
				}
			}
			</script>
			<div @keyup.escape="handleReset()">
				<?php include_once('fileupload.php');
            button("Upload");
            echo $err;
            ?>
			</div>
		</form>