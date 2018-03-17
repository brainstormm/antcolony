<?php
	require $_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php";
	$sharedConfig = [
		'region'  => 'us-west-2',
		'version' => 'latest',
		'credentials' => [
			'key' => 'AKIAI46VZ2HI327NLT6A',
			'secret' => '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'
		]
	];
	$sdk = new Aws\Sdk($sharedConfig);
	$client = $sdk->createS3();
	$result = $client->putObject([
		'Bucket' => 'antcolony',
		'Key' => 'images/jDBuvmpj7uOean7y1GJIkg0shjGnD8eGkFhzfWuQ.jpeg',
		'SourceFile' => "./jDBuvmpj7uOean7y1GJIkg0shjGnD8eGkFhzfWuQ.jpeg",
		'ACL'        => 'public-read'
	]);
?>