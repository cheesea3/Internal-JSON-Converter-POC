<div class="grid grid-cols-1 space-y-2">
	<label class="text-sm font-bold text-gray-500 tracking-wide">Attach Document</label>
	<div class="flex items-center justify-center w-full">
		<label for="addFile" class="flex flex-col rounded-lg border-4 border w-full h-60 p-10 group text-center">
			<div class="h-full w-full text-center flex flex-col items-center justify-center items-center  ">
				<div x-show="!files || files.map(file => file.name).toString() === ''">
					<svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-blue-900 group-hover:text-blue-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" /> </svg>
				</div>
				<template x-if="!files || files.map(file => file.name).toString() === ''">
					<div>
						<p class="pointer-none text-gray-500 text-sm"><span>Drag and drop files here</span>
							<br> <span>or</span> <span class="text-blue-600 hover:underline cursor-pointer">select a file</span> <span>from your computer</span></p>
					</div>
				</template>
				<p class="pointer-none text-gray-500 text-sm"><span class="break-all" x-text="!files ? '' : files.map(file => file.name).toString() != '' ? files.map(file => file.name).toString() : ''"></span></p>
				<template x-if="files && files.map(file => file.name).toString() != ''">
					<div>
						<button type="button" @click="handleReset()" class="bg-gray-300 text-gray-800 px-3 mt-1 mb-1 py-1 rounded">Reset</button>
					</div>
				</template>
				<input class="sr-only" type="file" name="file" class="hidden" id="addFile" x-on:change="files = Object.values($event.target.files)"> </label>
		</div>
	</div>
	<!-- File Upload Button -->
	<p :class="files === null || files.map(file => file.name).toString() === ''? 'text-gray-300' : files.map(file => file.name).toString().split('.').pop() === 'csv' ? 'text-green-600' : 'text-red-300'" class="text-sm mt-2 mb-2"> <span>File type: </span><span x-text="files === null || files.map(file => file.name).toString() === '' ? 'csv' : files.map(file => file.name).toString().split('.').pop() === 'csv' ? 'Valid' : 'Invalid'"></span> </p>
</div>