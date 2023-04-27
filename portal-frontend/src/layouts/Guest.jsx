import { Navigate, Outlet } from "react-router-dom";
import { useStateContext } from "../contexts/ContextProvider";
// import '../../dist/css/style.css';

export default function Guest() {
    const {token} = useStateContext();
    if (token) {
        return (
            <Navigate to ="/" />
        )
    }

    return (
    <div className="main-wrapper">
        <div className="preloader">
            <div className="lds-ripple">
                <div className="lds-pos"></div>
                <div className="lds-pos"></div>
            </div>
        </div>
        <div className="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
             style={{backgroundImage: "url(./public/assets/images/big/auth-bg.jpg)", backgroundRepeat: "no-repeat", backgroundPosition: "center"}}>
            <div className="auth-box row">
                <div className="col-lg-7 col-md-5 modal-bg-img" 
                // style="background-image: url(../assets/images/big/3.jpg);"
                style={{backgroundImage: "url(./public/assets/images/algerian-chmaber.jpg)", 
                        backgroundRepeat: "no-repeat", 
                        backgroundPosition: "center"}}>
                </div>
                <div className="col-lg-5 col-md-7 bg-white">
                        <Outlet />
                </div>
            </div>
        </div>
    </div>
    )
}