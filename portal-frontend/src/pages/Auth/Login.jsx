import { Link } from "react-router-dom";

export default function Login() {
  const onSubmit = (event) => {
    event.preventDefault();

  };

  return (
    <div className="p-3 animated fadeInDown">
      <div className="text-center">
        <img src="./public/assets/images/big/icon.png" alt="wrapkit" />
      </div>
      <h2 className="mt-3 text-center">Sign In</h2>
      <p className="text-center">Enter your email address and password to access admin panel.</p>
      <form className="mt-4" onSubmit={onSubmit}>
        <div className="row">
          <div className="col-lg-12">
            <div className="form-group">
              <label className="text-dark" htmlFor="uname">Username</label>
              <input className="form-control" id="uname" type="text"
                placeholder="enter your username" />
            </div>
          </div>
          <div className="col-lg-12">
            <div className="form-group">
              <label className="text-dark" htmlFor="pwd">Password</label>
              <input className="form-control" id="pwd" type="password"
                placeholder="enter your password" />
            </div>
          </div>
          <div className="col-lg-12 text-center">
            <button type="submit" className="btn btn-block btn-dark">Sign In</button>
          </div>
          <div className="col-lg-12 text-center mt-5">
            Don't have an account? <Link to="/signup" className="text-danger">Sign Up</Link>
          </div>
        </div>
      </form>
    </div>
  )
}