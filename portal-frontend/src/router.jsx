import {createBrowserRouter, Navigate} from "react-router-dom";
import Home from "./pages/Home.jsx";
import Login from "./pages/Auth/Login";
import NotFound from "./pages/NotFound.jsx";
import Signup from "./pages/Auth/Signup.jsx";
import Guest from "./layouts/Guest.jsx";
import Main from "./layouts/Main.jsx";
import Ministry from "./pages/Dashboards/Ministry.jsx";
import Chamber from "./pages/Dashboards/Chamber.jsx";
import Calendar from "./pages/Calendar.jsx";
const router = createBrowserRouter([
    {
        path: "/",
        element: <Main />,
        children: [
            {
                path: "/",
                // element: <Navigate to={Home} />,
                element: <Home />,
            },
            {
                path: "/home",
                element: <Home />,
            },
            {
                path: "/dashboards/ministry",
                element: <Ministry />,
            },
            {
                path: "/dashboards/chamber",
                element: <Chamber />,
            },
            {
                path: "/calendar",
                element: <Calendar />,
            },
        ]
    },
    {
        path: "/",
        element: <Guest />,
        children: [
            {
                path: "/login",
                element: <Login />,
            },
            {
                path: "/signup",
                element: <Signup />,
            },
        ]
    },
    {
        path: "*",
        element: <NotFound />,
    },
])

export default router;