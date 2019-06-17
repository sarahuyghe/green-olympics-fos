import React from "react";
import { inject, observer } from "mobx-react";
import ReactPlayer from "react-player";

const Inzendingen = ({ store }) => {
	const { inzendingen } = store;
	return (
		<div>
			<h1>weergeven inzendingen</h1>
			{inzendingen.map(inzending => (
				<div key={inzending.id}>
					<h2>new one</h2>
					<p>{inzending.opdracht}</p>
					<p>{inzending.scouts}</p>
					<ReactPlayer url={`${inzending.link}`} />
				</div>
			))}
		</div>
	);
};

export default inject("store")(observer(Inzendingen));
