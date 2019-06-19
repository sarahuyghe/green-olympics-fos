import React from "react";
import "./App.css";
import { Route, Switch } from "react-router-dom";
import { inject } from "mobx-react";

import Form from "./components/Form";
import Inzendingen from "./components/Inzendingen";
import Home from "./components/Home";
import Navigation from "./components/navigation";
import Login from "./components/auth/Login";
import Opdrachten from "./components/Opdrachten";
import Rules from "./components/Rules";
import RegisterForm from "./components/auth/RegisterForm";

import { ROUTES } from "./constants/";

function App() {
	return (
		<>
			<Navigation />
			<Switch>
				<Route path={ROUTES.home} exact strict component={Home} />
				<Route path={ROUTES.uitdagingen} component={Opdrachten} />
				<Route path={ROUTES.admin} component={RegisterForm} />
				<Route path={ROUTES.spelregels} component={Rules} />
				<Route path={ROUTES.scoreboard} component={Inzendingen} />
				<Route path={ROUTES.uploaden} component={Form} />
			</Switch>
		</>
	);
}
export default inject("uiStore")(App);
