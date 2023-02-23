import React from 'react';

import '../css/cadastro.css';

const Cadastrocliente = () => {

    function handleSubmit(e) {
    }

    return ( 
        <form
            onSubmit={e => { e.preventDefault(); 
                handleSubmit(e);
            }}
            id='CLIENTE'
            className='form-container'
        >
            <div className='cadastro-item'>
                <fieldset className='teste'>
                    <input 
                        type={'text'} 
                        placeholder='Nome' 
                        maxLength={100}
                        id='NOME'
                        className='input-config'
                        autoComplete='off'
                        required
                    />
                    <input
                        name='cpf'
                        placeholder='Digite o CPF'
                        id='CPF'
                        className='input-config'
                        autoComplete='off'
                        required
                    />
                </fieldset>
                <fieldset className='teste'>
                    <input 
                        type={'text'} 
                        placeholder='Telefone' 
                        maxLength={30}
                        id='TELEFONE'
                        className='input-config'
                        autoComplete='off'
                    />
                    <input 
                        type={'text'} 
                        placeholder='Email'
                        id='EMAIL'
                        className='input-config'
                        autoComplete='off'
                    />
                    
                </fieldset>
                <fieldset>
                    <select 
                        name = 'seletor_tipo'
                        placeholder='Selecione uma opção'
                        id='TIPO'
                        required
                    >
                        <option value={'placehorder'} disabled  > selecione uma opção </option>
                        <option value={'C'}> Cliente </option>
                        <option value={'F'}> Fornecedor </option>
                    </select>

                </fieldset>

            </div>
            <button type='submit' id='item-button'>Cadastrar</button>
        </form>
     );
}
 
export default Cadastrocliente;