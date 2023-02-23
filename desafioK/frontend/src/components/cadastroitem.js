import React from 'react';

import '../css/cadastro.css';

const Cadastroitem = () => {
    return ( 
        <form
            onSubmit={e => { e.preventDefault() }}
            id='CLIENTE'
            className='form-container'
        >
            <div className='cadastro-item'>
                <fieldset className='teste'>
                    <input 
                        type={'text'} 
                        placeholder='Nome' 
                        maxLength={150}
                        id='NOME'
                        className='input-config'
                        autoComplete='off'
                        required
                    />
                </fieldset>
                <fieldset>
                    <textarea
                        placeholder='Descrição'
                        id='DESCRICAO'
                        className='input-config'
                        required
                    />
                </fieldset>
                <fieldset className='teste'>
                    <input 
                        type={'text'} 
                        placeholder='Quantidade' 
                        maxLength={17}
                        id='QUANT'
                        className='input-config'
                        autoComplete='off'
                        required
                    />
                    <input 
                        type={'text'} 
                        placeholder='Valor'
                        id='VAL'
                        className='input-config'
                        autoComplete='off'
                        required
                    />
                    
                </fieldset>

            </div>
            <button type='submit' id='item-button'>Cadastrar</button>
        </form>
     );
}
 
export default Cadastroitem;