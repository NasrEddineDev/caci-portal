import { useRef, useState } from "react";
import { Link } from "react-router-dom";
import axiosClient from "../../axios-client";
import { useStateContext } from "../../contexts/ContextProvider";

export default function Signup() {
  const nameRef = useRef();
  const emailRef = useRef();
  const passwordRef = useRef();
  const passwordConfirmationRef = useRef();

  const [errors, setErrors] = useState();
  const {setUser, setToken} = useStateContext()

  const onSubmit = (event) => {
    event.preventDefault();
    const payload = {
      name: nameRef.current.value,
      email: emailRef.current.value,
      password: passwordRef.current.value,
      password_confirmation: passwordConfirmationRef.current.value,
    }
    axiosClient.post('/signup', payload)
    .then((response) => {
      console.log(response.data);
      setUser(response.data.user);
      setToken(response.data.token);
      // localStorage.setItem('token', response.data.token);
      // localStorage.setItem('user_id', response.data.user_id);
      // localStorage.setItem('user_name', response.data.user_name);
      // localStorage.setItem('user_email', response.data.user_email);
      // localStorage.setItem('user_role', response.data.user_role);
      // localStorage.setItem('user_image', response.data.user_image);
      // window.location.href = '/dashboard';
    })
    .catch((error) => {
      console.log(error);
      const response = error.response;
      if (response && response.status === 422) { 
        const errors = response.data.errors;
        // Object.values(errors).forEach((error) => {
        //   alert(error);
        // });
        console.log(response.data);
        setErrors(errors);
      }
    });

  };

  return (
    <div className="p-3">
    <div className="text-center">
      <img src="./public/assets/images/big/icon.png" alt="wrapkit" />
    </div>
      <h2 className="mt-3 text-center">Sign Up for Free</h2>
      <p className="text-center">Enter your email address and password to access admin panel.</p>
      <p>
           {
              errors && <div className="badge-danger">
                  {/* {errors.name && <li>{errors.name}</li>}
                  {errors.email && <li>{errors.email}</li>}
                  {errors.password && <li>{errors.password}</li>}
                  {errors.password_confirmation && <li>{errors.password_confirmation}</li>} */}
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
              <input ref={nameRef} className="form-control" type="text" placeholder="your name" />
            </div>
          </div>
          <div className="col-lg-12">
            <div className="form-group">
              <input ref={emailRef} className="form-control" type="email" placeholder="email address" />
            </div>
          </div>
          <div className="col-lg-12">
            <div className="form-group">
              <input ref={passwordRef} className="form-control" type="password" placeholder="password" />
            </div>
          </div>
          <div className="col-lg-12">
            <div className="form-group">
              <input ref={passwordConfirmationRef} className="form-control" type="password" placeholder="password confirmation" />
            </div>
          </div>
          <br />
          <div className="col-lg-12 text-center">
            <button type="submit" className="btn btn-block btn-dark">Sign Up</button>
          </div>
          <div className="col-lg-12 text-center mt-5">
            Already have an account? <Link to="/login" className="text-danger">Sign In</Link>
          </div>
        </div>
      </form>
    </div>
  )
    {/* <div className="p-3">
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
            Don't have an account? <a href="#" className="text-danger">Sign Up</a>
          </div>
        </div>
      </form>
    </div> */}
}