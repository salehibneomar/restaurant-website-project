import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Header from './Components/Header'
import Footer from './Components/Footer'
import Home from './Pages/Home';
import Contact from './Pages/Contact'
import { SiteInformationsContextProvider } from './Contexts/SiteInformationsContext';

function App() {
  return (
    <SiteInformationsContextProvider>
    <Router>
      <div className="container">
        <Header />
          <Routes>
            <Route path='/' element={<Home />} />
            <Route path='/contact' element={<Contact />} />
          </Routes>
        <Footer />
      </div>
    </Router>
    </SiteInformationsContextProvider>
  );
}

export default App;
