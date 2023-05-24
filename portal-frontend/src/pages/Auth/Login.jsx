import { useRef, useState } from "react";
import { Link } from "react-router-dom";
import axiosClient from "../../axios-client";
import { useStateContext } from "../../contexts/ContextProvider";

export default function Login() {
  const [errors, setErrors] = useState();
  const {setUser, setToken} = useStateContext()
  const emailRef = useRef();
  const passwordRef = useRef();
  const onSubmit = (event) => {
    event.preventDefault();

    const payload = {
      email: emailRef.current.value,
      password: passwordRef.current.value,
    }
    setErrors(null);
    axiosClient.post('/v1/login', payload)
    .then((response) => {
      console.log(response.data);
      setUser(response.data.user);
      setToken(response.data.access_token);
    })
    .catch((error) => {
      console.log(error);
      const response = error.response;
      if (response && response.status === 422) { 
        const errors = response.data.errors;
        console.log(response.data);
        if (response.data.errors){
          setErrors(errors);
        } else {
          setErrors({email: [response.message]});
        }
      }
    });

  };

  return (
    <div className="p-3 animated fadeInDown">
      <div className="text-center">
        <img src="./public/assets/images/big/icon.png" alt="wrapkit" />
      </div>
      <h2 className="mt-3 text-center">Sign In</h2>
      <p className="text-center">Enter your email address and password to access admin panel.</p>
      <p className="text-center">
           {
              errors && <div className="badge-danger">
                  {Object.keys(errors).map(key => (
                    <p key={key}>{errors[key][0]}</p>
                    ))}
              </div>
           }  
      </p>
      <form className="mt-4" onSubmit={onSubmit}>
        <div className="row">
          <div className="col-lg-12">
            <div className="form-group">
              <label className="text-dark" htmlFor="email">Email</label>
              <input ref={emailRef} className="form-control" id="email" type="text"
                placeholder="enter your email" />
            </div>
          </div>
          <div className="col-lg-12">
            <div className="form-group">
              <label className="text-dark" htmlFor="pwd">Password</label>
              <input ref={passwordRef} className="form-control" id="pwd" type="password"
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