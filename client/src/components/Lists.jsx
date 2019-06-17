import React from "react";
import { inject, observer } from "mobx-react";

const List = ({ store }) => {
	const { inzendingen } = store;
	const opdrachtInput = React.createRef();

	const handleSubmit = e => {
		e.preventDefault();
		console.log(opdrachtInput.current.value);
		store.addInzending({ opdracht: opdrachtInput.current.value });
		opdrachtInput.current.value = "";
	};
	return (
		<>
			<div>
				{inzendingen.map(inzending => (
					<p key={inzending.id}>{inzending.opdracht}</p>
				))}
			</div>
			<div>
				<form onSubmit={handleSubmit}>
					<label>
						opdracht naam
						<input type="text" ref={opdrachtInput} />
					</label>
					<input type="submit" />
				</form>
			</div>
		</>
	);
};

export default inject("store")(observer(List));
