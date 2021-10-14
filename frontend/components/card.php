<!-- File Upload Card -->
<div class="w-full flex mb-8">
	<div class="mx-auto p-1 bg-white space-y-8 rounded-sm md:p-12 md:shadow-xl">
		<!-- File Upload Title-->
		<h1 class="mx-5 text-blue-900 uppercase tracking-widest text-2xl">
			<?php
			if($err === ''){
				if (!$success) {
					include_once('subcomponents/form.php');
				}
				}			
			?>Content Converter</h1>
		<!-- File Upload Subtitle -->
		<p class="text-gray-900 break-normal tracking-wide m-1">Please upload your content_services_csv,
			<br>and it will be converted to JSON.</p>
			<? 
			echo $err;
			if($err === ''){
			if (!$success) {
				include_once('subcomponents/form.php');
			}
			}
 ?>
	</div>
</div>
<!-- End File Upload Card -->