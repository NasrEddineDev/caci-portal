import { combineReducers } from "redux";
import TestReducer from "./TestReducer";

const reducers1 = combineReducers({
  Test: TestReducer,
  //other reducers come here...
});

export default reducers1;