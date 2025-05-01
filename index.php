<?php


$database = new PDO("pgsql:host=127.0.0.1;port=5432;dbname=simple_chat;", "postgres", "secret");
$messages = $database->query("SELECT * FROM messages")->fetchAll();

$currentUser = "Morkius";
$title = "Simple Chat";

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="preconnect" href="https://rsms.me/" />
		<link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
		<link rel="stylesheet" href="/index.css" />
		<script src="https://unpkg.com/@tailwindcss/browser@4"></script>
		<title>Simple Chat</title>
	</head>
	<body class="h-screen flex flex-col bg-[#251f31]">
		<div
			class="max-w-screen-md mx-auto bg-[#322b3f] flex-1 w-full rounded-3xl flex h-full flex-col overflow-hidden my-6"
		>
			<div
				class="px-8 pt-3 pb-3 justify-center flex text-[#897fad] font-semibold text-2xl border-b border-[#3f3650]"
			>
				<?php
				echo $title;
				?>
			</div>
			<div class="space-y-4 flex flex-col px-4 overflow-auto w-full pb-2">
				<?php

				for ($index = 0; $index < count($messages); $index++ ) {
					if ($messages[$index]["author_name"] === $currentUser) {
						?>
						<div class="self-end">
							<div class="font-medium text-sm mb-1 text-[#110e16]">
								<?php
								echo $messages[$index]["author_name"] . " • " . date_format(date_create($messages[$index]["created_at"]), "Y-m-d H:i");
								?>
							</div>
							<div
								class="bg-[#3e3257] rounded-2xl rounded-tr-none px-3 py-2 max-w-[400px] text-[#897fad] shadow-lg"
							>
								<?php
								echo $messages[$index]["message"];
								?>
							</div>
						</div>
						<?php
						
					} else {
						?>
						<div>
							<div class="font-medium text-sm mb-1 text-[#110e16]">
								<?php
								echo $messages[$index]["author_name"] . " • " . date_format(date_create($messages[$index]["created_at"]), "Y-m-d H:i");
								?>
							</div>
							<div
								class="bg-[#3c3549] rounded-2xl rounded-tl-none px-3 py-2 max-w-[400px] text-[#0a090e] shadow-lg"
							>
								<?php
								echo $messages[$index]["message"];
								?>
							</div>
						</div>
						<?php
					}
				}
				?>
			</div>
			<div class="flex w-full items-center">
				<div
					class="overflow-hidden rounded-2xl w-full m-4 h-16 focus-within:outline-none focus-within:ring-4 focus-within:ring-[#251f31]"
				>
					<textarea
						class="bg-[#3c3549] w-full h-16 rounded-2xl px-4 pt-5 pb-5 resize-none focus:outline-none text-[#0a090e]"
						placeholder="Type your message here..."
					></textarea>
				</div>
				<button
					class="rounded-2xl bg-[#3c3549] size-16 justify-center flex items-center mr-4 mb-4 mt-4 flex-none hover:bg-[#393244] duration-150"
					type="button"
				>
					<svg
						viewBox="0 0 24 24"
						fill="none"
						xmlns="http://www.w3.org/2000/svg"
						class="size-8 text-[#211c2c]"
					>
						<path
							d="M10.5004 12H5.00043M4.91577 12.2915L2.58085 19.2662C2.39742 19.8142 2.3057 20.0881 2.37152 20.2569C2.42868 20.4034 2.55144 20.5145 2.70292 20.5567C2.87736 20.6054 3.14083 20.4869 3.66776 20.2497L20.3792 12.7296C20.8936 12.4981 21.1507 12.3824 21.2302 12.2216C21.2993 12.082 21.2993 11.9181 21.2302 11.7784C21.1507 11.6177 20.8936 11.5019 20.3792 11.2705L3.66193 3.74776C3.13659 3.51135 2.87392 3.39315 2.69966 3.44164C2.54832 3.48375 2.42556 3.59454 2.36821 3.74078C2.30216 3.90917 2.3929 4.18255 2.57437 4.72931L4.91642 11.7856C4.94759 11.8795 4.96317 11.9264 4.96933 11.9744C4.97479 12.0171 4.97473 12.0602 4.96916 12.1028C4.96289 12.1508 4.94718 12.1977 4.91577 12.2915Z"
							stroke="currentColor"
							stroke-width="2"
							stroke-linecap="round"
							stroke-linejoin="round"
						/>
					</svg>
				</button>
			</div>
		</div>
	</body>
</html>
