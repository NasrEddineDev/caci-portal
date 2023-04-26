import {createBrowserRouter, Navigate} from "react-router-dom";
import Home from "./pages/Home.jsx";
import Login from "./pages/Auth/Login";
import NotFound from "./pages/NotFound.jsx";
import Signup from "./pages/Auth/Signup.jsx";
import Guest from "./layouts/Guest.jsx";
import Main from "./layouts/Main.jsx";
import Ministry from "./pages/Dashboard/Ministry.jsx";
import Chamber from "./pages/Dashboard/Chamber.jsx";

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
                path: "/dashboard/minstry",
                element: <Ministry />,
            },
            {
                path: "/dashboard/chamber",
                element: <Chamber />,
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