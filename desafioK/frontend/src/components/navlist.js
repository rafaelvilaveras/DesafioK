import React from 'react';

import '../css/navlist.css';

const Navlist = ({active, turnActive}) => {
    return ( 
        <ul className='item-container'>
            <li 
                className={active === 1  ? 'active' : 'notactive'}
                onClick = {() => turnActive(1)}
            >Cadastro Cliente</li>
            <li 
                className={active === 2  ? 'active' : 'notactive'}
                onClick = {() => turnActive(2)}
            >Cadastro Item</li>
            <li 
                className={active === 3  ? 'active' : 'notactive'}
                onClick = {() => turnActive(3)}
            >Clientes</li>
            <li 
                className={active === 4  ? 'active' : 'notactive'}
                onClick = {() => turnActive(4)}
            >Entrada / Saída</li>
        </ul>
     );
}
 
export default Navlist;