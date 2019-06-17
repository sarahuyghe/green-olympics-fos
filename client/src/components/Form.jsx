import React from "react";
import { inject, observer } from "mobx-react";

const Form = ({ store }) => {
	const opdrachtInput = React.createRef();
	const linkInput = React.createRef();
	const scoutsInput = React.createRef();

	const handleSubmit = e => {
		e.preventDefault();

		store.addInzending({
			opdracht: opdrachtInput.current.value,
			link: linkInput.current.value,
			scouts: scoutsInput.current.value
		});
		opdrachtInput.current.value = "";
		linkInput.current.value = "";
		scoutsInput.current.value = "";
	};
	return (
		<div>
			<h1>Form toevoegen</h1>
			<form onSubmit={handleSubmit}>
				<label>
					opdracht
					<input type="text" ref={opdrachtInput} />
				</label>
				<label>
					Link video
					<input type="text" ref={linkInput} />
				</label>
				<label>
					naam scouts
					<input type="text" ref={scoutsInput} />
				</label>
				<input type="submit" />
			</form>
		</div>
	);
};

export default inject("store")(observer(Form));
