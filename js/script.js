{
	let allScouts = [];

	const getAllScouts = () => {
		const scouts = document.querySelectorAll(`.scouts`);
		// console.log(scouts);
		scouts.forEach(scout => {
			// console.log(scout.innerHTML);
			allScouts.push(scout.innerHTML);
		});
		console.log(allScouts);
	};

	countdownClock = () => {
		var $idee = document.querySelectorAll(`.opdrachten`);
		$idee.forEach($element => {
			{
				var $div = $element.children[0].children[1];
				var $deadline = new Date($div.children[1].innerHTML).getTime();
				var $now = new Date().getTime();
				var t = $deadline - $now;
				var days = Math.floor(t / (1000 * 60 * 60 * 24));
				var hours = Math.floor((t % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
				var seconds = Math.floor((t % (1000 * 60)) / 1000);
				$div.children[2].innerHTML = days + " dagen";
				$div.children[3].innerHTML = hours + " uur";
				$div.children[4].innerHTML = minutes + " minuten";
				$div.children[5].innerHTML = seconds + " seconden";

				if (t < 0) {
					$div.style.display = "none";
					$element.children[0].firstElementChild.classList.remove("hide");
				}
			}
		});
	};
	countdownMain = () => {
		var $idee = document.querySelectorAll(`.testing`);
		$idee.forEach($element => {
			{
				var $div = $element.children[0];
				var $deadline = new Date($div.children[1].innerHTML).getTime();
				var $now = new Date().getTime();
				var t = $deadline - $now;
				var days = Math.floor(t / (1000 * 60 * 60 * 24));
				var hours = Math.floor((t % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
				var seconds = Math.floor((t % (1000 * 60)) / 1000);
				$div.children[2].innerHTML = days + " dagen";
				$div.children[3].innerHTML = hours + " uur";
				$div.children[4].innerHTML = minutes + " minuten";
				$div.children[5].innerHTML = seconds + " seconden";
				if (t < 0) {
					$element.children[1].classList.remove("hide");
					$element.children[0].classList.add("hide");
				}
			}
		});
	};

	handleClickUpDown = e => {
		e.stopPropagation();
		e.preventDefault();
		var $active = document.querySelector(`div.month.active`);
		const $el = document.querySelector(`.testing.active`);
		$active.classList.remove("active");
		if (e.currentTarget.classList.contains("up")) {
			$el.classList.remove("active");
			$el.classList.add("hide");
			$el.previousElementSibling.classList.remove("hide");
			$el.previousElementSibling.classList.add("active");
			var $previous = $active.previousElementSibling;
			$active.classList.add("next");

			$active.addEventListener(`click`, handleClickUpDown);
			$previous.classList.add("active");
			$previous.classList.remove("hide");
			$previous.children[1].classList.remove("hide");

			$previous.classList.remove("up");
			if ($previous.previousElementSibling == null) {
				console.log("do nothing");
			} else if ($active.nextElementSibling == null) {
				$previous.previousElementSibling.classList.add("up");
				$previous.previousElementSibling.addEventListener(
					`click`,
					handleClickUpDown
				);
				$previous.previousElementSibling.classList.remove("hide");
			} else {
				$active.nextElementSibling.classList.remove("next");
				$active.nextElementSibling.classList.add("hide");
				$previous.previousElementSibling.classList.add("up");
				$previous.previousElementSibling.addEventListener(
					`click`,
					handleClickUpDown
				);
				$previous.previousElementSibling.classList.remove("hide");
			}
		} else {
			if ($active.previousElementSibling == null) {
				console.log("do nothing");
			} else {
				$active.previousElementSibling.classList.remove("up");
				$active.previousElementSibling.classList.add("hide");
			}
			$el.classList.remove("active");
			$el.classList.add("hide");
			$el.nextElementSibling.classList.remove("hide");
			$el.nextElementSibling.classList.add("active");

			var $next = $active.nextElementSibling;
			$active.classList.add("up");
			$active.addEventListener(`click`, handleClickUpDown);
			$next.classList.add("active");
			$next.children[1].classList.remove("hide");
			$next.classList.remove("hide");
			$next.classList.remove("next");
			$next.nextElementSibling.classList.add("next");
			$next.nextElementSibling.addEventListener(`click`, handleClickUpDown);
			$next.nextElementSibling.classList.remove("hide");
		}
	};
	const filterBySeasonAndTitle = scout => {
		console.log(scout);
		const title = document.querySelector(`#lol`).value.toLowerCase();
		if (scout.toLowerCase().includes(title)) {
			console.log("it works");
			return true;
		}
	};

	const createResultItems = scouts => {
		console.log(scouts);
	};

	const handlesubmitForm = e => {
		e.preventDefault();

		const filteredEpisodes = allScouts.filter(filterBySeasonAndTitle);
		createResultItems(filteredEpisodes);
	};

	const startHeader = () => {
		var $idee = document.querySelectorAll(`.month`);

		var $begindate = document.querySelectorAll(`.testing`);
		for (i = 0; i < $idee.length; i++) {
			$j = $idee[i].children[2];
			var $deadline = new Date($j.innerHTML).getMonth();
			var $now = new Date().getMonth();
			if ($now === $deadline) {
				$begindate[i].classList.remove("hide");
				$begindate[i].classList.add("active");

				$idee[i].classList.remove("hide");
				$idee[i].classList.remove("hide");
				$idee[i].classList.add("active");
				if ($idee[i].previousElementSibling == null) {
					$idee[i].nextElementSibling.classList.add("next");
					$idee[i].nextElementSibling.addEventListener(
						`click`,
						handleClickUpDown
					);
					$idee[i].nextElementSibling.classList.remove("hide");
				} else if ($idee[i].nextElementSibling == null) {
					$idee[i].previousElementSibling.classList.add("up");
					$idee[i].previousElementSibling.addEventListener(
						`click`,
						handleClickUpDown
					);
					$idee[i].previousElementSibling.classList.remove("hide");
				} else {
					$idee[i].previousElementSibling.classList.add("up");
					$idee[i].previousElementSibling.classList.remove("hide");
					$idee[i].nextElementSibling.classList.add("next");
					$idee[i].nextElementSibling.classList.remove("hide");
				}
			}
		}
	};

	const init = () => {
		getAllScouts();
		countdownClock();
		countdownMain();
		startHeader();

		var $form = document.querySelector(`.filter-form`);

		setInterval(countdownClock, 1000);
		setInterval(countdownMain, 1000);
	};

	init();
}
