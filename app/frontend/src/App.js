import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Header from './Components/Header'
import Footer from './Components/Footer'
import Home from './Pages/Home';
import Contact from './Pages/Contact'
import { SiteInformationsContextProvider } from './Contexts/SiteInformationsContext';
import { ContactContextProvider } from './Contexts/ContactContext';
import { MenuContextProvider } from './Contexts/MenuContext';

function App() {
  return (
    <SiteInformationsContextProvider>
      <ContactContextProvider>
        <MenuContextProvider>
          <Router>
            <div className="container">
              <Header />
                <Routes>
                  <Route exact path='/' element={<Home />} />
                  <Route exact path='/contact' element={<Contact />} />
                  <Route path='/menu/items/:id' element={<Home />} />
                </Routes>
              <Footer />
            </div>
          </Router>
        </MenuContextProvider>
      </ContactContextProvider>
    </SiteInformationsContextProvider>
  );
}

export default App;
