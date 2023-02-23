import { useState } from 'react';
import '../css/App.css';
import Itemlist from './itemlist';
import Navlist from './navlist';

function App() {

  const [active, turnActive] = useState(3)


  return (
    <div className="App">
      <div className='content'>

        <nav className='nav-items'>
          <Navlist
            active = {active}
            turnActive = {turnActive}
          />
        </nav>

        <section className='section-container'>
          <Itemlist
            active = {active}
            turnActive = {turnActive}
          />
        </section>

      </div>
    </div>
  );
}

export default App;
