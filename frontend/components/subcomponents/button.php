<div class="mb-2 mt-2 grid grid-cols-1 space-y-2">
	<template x-if="files">
		<div x-show="files.map(file => file.name).toString().split('.').pop() === 'csv' && document.getElementById('addFile').value !== '' && files">
			<div>
				<button name="fileupload" class="py-2 w-full tracking-wide rounded text-center mx-auto bg-blue-900 text-white shadow select-none cursor-pointer shadow-xl">
					<?echo $text?>
				</button>
			</div>
		</div>
</div>
</template>
<template x-if="files === null || files.map(file => file.name).toString().split('.').pop() !== 'csv'">
	<div name="fileupload" class="py-2 w-full tracking-wide rounded text-center mx-auto bg-gray-100 text-gray-300 select-none shadow-sm">
		<?echo $text?>
	</div>
	</div>
</template>
</div>