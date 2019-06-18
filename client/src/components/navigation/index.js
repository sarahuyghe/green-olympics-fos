import React from "react";
import { NavLink } from "react-router-dom";
import { ROUTES } from "../../constants";

const Navigation = () => {
	return (
		<nav>
			<>
				<ul>
					<li>
						<NavLink to={ROUTES.home}>Home</NavLink>
					</li>
					<li>
						<NavLink to={ROUTES.uitdagingen}>uitdagingen</NavLink>
					</li>
					<li>
						<NavLink to={ROUTES.admin}>login</NavLink>
					</li>
					<li>
						<NavLink to={ROUTES.spelregels}>spelregels</NavLink>
					</li>
					<li>
						<NavLink to={ROUTES.scoreboard}>scoreboard</NavLink>
					</li>
					<li>
						<NavLink to={ROUTES.uploaden}>uploaden</NavLink>
					</li>
				</ul>
			</>
		</nav>
	);
};

export default Navigation;
