export const getAllUsers = () => {
    return (dispatch) => {import.meta.env.API_BASE_URL
      //   fetch placeholder data from jsonplaceholder
      fetch(import.meta.env.API_BASE_URL)
        // "https://jsonplaceholder.typicode.com/users" )
        .then((response) => response.json())
        .then((result) =>
          //dispatch response to the store
          dispatch({ type: "DO_THIS", payload: result })
        );
    };
  };