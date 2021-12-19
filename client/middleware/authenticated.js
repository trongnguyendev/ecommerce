
export default function ({redirect, store}) {
    const isAuthenticated = store.state.auth.user ? true : false
    console.log("middleware: " + store.state.auth.user);
    if (!isAuthenticated) {
      redirect({name: 'login'})
    }
  }