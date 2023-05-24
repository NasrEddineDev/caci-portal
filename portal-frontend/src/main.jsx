import React from 'react'
import ReactDOM from 'react-dom/client'
import App from './App.jsx'
import './index.css'
import router from './router.jsx'
import { RouterProvider } from 'react-router-dom'
import { ContextProvider } from './contexts/ContextProvider.jsx'
import { Provider, createStoreHook } from 'react-redux'
import i18next from 'i18next';
import global_ar from './translations/ar/global.json';
import global_en from './translations/en/global.json';
import global_fr from './translations/fr/global.json';
// import { createStore } from 'redux'
import { store } from './state/store.js'
import { I18nextProvider } from 'react-i18next'


i18next.init({
  interpolation: { escapeValue: false },
  lng: "en",
  resources: {
    ar: {
      global: global_ar
    },
    en: {
      global: global_en
    },
    fr: {
      global: global_fr
    }
  }
})
// //Store : Globa
// // const store = createStoreHook()
// //Action : describe what you want to do
// const increment = () => {
//   return {
//     type: "INCREMENT"
//   }
// }
// const decrement = () => {
//   return {
//     type: "DECREMENT"
//   }
// }

// //REDUCER : Check what to do, and modify the state/store
// const counter = (state = 0, action) => {
//   switch (action.type){
//     case "INCREMENT":
//       return state + 1
//     case "DECREMENT":
//       return state - 1
//   }
// }

// // let store = createStore(counter)

//       //Display
// store.subscribe(() => console.log(store.getState()))

// //DISPACH : Send Action to the reducer
// store.dispatch(increment())
// store.dispatch(decrement())
// store.dispatch(decrement())
// store.dispatch(decrement())

ReactDOM.createRoot(document.getElementById('root')).render(
  <Provider store={store}>
    <React.StrictMode>
      <I18nextProvider i18n={i18next}>
        <ContextProvider>
          <RouterProvider router={router} />
          {/* <App /> */}
        </ContextProvider>
      </I18nextProvider>
    </React.StrictMode>
  </Provider>,
)
