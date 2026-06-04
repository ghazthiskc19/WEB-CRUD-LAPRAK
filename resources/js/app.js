document.addEventListener('click', (event) => {
	const closeButton = event.target.closest('[data-flash-close]');

	if (!closeButton) {
		return;
	}

	const flash = closeButton.closest('[data-flash]');

	if (flash) {
		flash.remove();
	}
});
