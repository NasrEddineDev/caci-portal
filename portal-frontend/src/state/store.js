// import { applyMiddleware, createStore } from "redux";
// import thunk from "redux-thunk";
// import reducers from "./Reducers";

// //thunk middleware is used to intercept actions so as to make API call before dispatching result to reducer
// const store = createStore(reducers, applyMiddleware(thunk));

// export default store;

import { combineReducers, configureStore } from '@reduxjs/toolkit'
// import todosReducer from '../features/todos/todosSlice'
// import filtersReducer from '../features/filters/filtersSlice'
import TestReducer from './reducers/TestReducer'
import thunk from "redux-thunk";
import reducers1 from './reducers';

export const store = configureStore({
  reducer: reducers1
//   applyMiddleware(thunk)
})