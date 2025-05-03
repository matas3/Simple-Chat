document
	.querySelector(".message-button")
	.addEventListener("click", async () => {
		const message = document.querySelector(".message-box").value;
		const formData = new FormData();
		formData.append("message", message);
		await fetch("/create-message.php", {
			body: formData,
			method: "POST",
		});
		location.reload();
	});

const scrollBox = document.querySelector(".scroll-box");
scrollBox.scrollTo(0, scrollBox.scrollHeight);
