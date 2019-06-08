{
	const countDown = () => {

	}

	const dropdownFunction = e => {
		e.preventDefault();
		const $clickedElement = e.currentTarget;
		console.log($clickedElement);

		const $toBeDroppedDownItem = document.querySelector(`.dropdown-item-${$clickedElement.dataset.id}`);

		if($toBeDroppedDownItem.style.display = "none") {
			$toBeDroppedDownItem.style.display = "grid";
			$clickedElement.innerHTML = "READ LESS";
		}

		
		
	}

	const init = () => {}
		const $readMore = document.querySelectorAll('.readmore');
		$readMore.forEach($readMoreBtn =>
			$readMoreBtn.addEventListener('click', dropdownFunction)
		);

	init();
}
