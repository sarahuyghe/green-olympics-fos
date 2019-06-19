import React from "react";
import { inject, observer } from "mobx-react";
import ReactPlayer from "react-player";

const Inzendingen = ({ inzendingenStore }) => {
	const { inzendingen } = inzendingenStore;
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

export default inject("inzendingenStore")(observer(Inzendingen));
