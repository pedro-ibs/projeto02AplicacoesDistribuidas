package br.edu.livros.acervo.services;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import br.edu.livros.acervo.converter.DozerConverter;
import br.edu.livros.acervo.data.model.Person;
import br.edu.livros.acervo.data.vo.v1.PersonVO;
import br.edu.livros.acervo.exception.ResourceNotFoundException;
import br.edu.livros.acervo.repository.PersonRepository;

@Service
public class PersonServices {
	
	@Autowired
	PersonRepository repository;
	
	public PersonVO create(PersonVO person) {
		var entity = DozerConverter.parseObject(person, Person.class);
		var vo = DozerConverter.parseObject(repository.save(entity), PersonVO.class);
		return vo;
	}
	
	public List<PersonVO> findAll() {
		return DozerConverter.parseListObjects(repository.findAll(), PersonVO.class);
	}
	
	public PersonVO findById(Long id) {
		var entity = repository.findById(id) .orElseThrow(() -> new ResourceNotFoundException ("Não encontramos registros para este ID"));
		return DozerConverter.parseObject(entity, PersonVO.class);
	}
	
	public PersonVO update(PersonVO person) {
		var entity = repository.findById(person.getKey()).orElseThrow(() -> new ResourceNotFoundException ("Não encontramos registros para este ID"));
		entity.setFirstName(person.getFirstName());
		entity.setLastName(person.getLastName());
		entity.setEmail(person.getEmail());		
		entity.setPassword(person.getPassword());
		entity.setAddress(person.getAddress());
		entity.setGender(person.getGender());
		
		var vo = DozerConverter.parseObject(repository.save(entity), PersonVO.class);
		return vo;
	}
	
	public void delete(Long id) {
		Person entity = repository.findById(id).orElseThrow(() -> new ResourceNotFoundException("Não encontramos registros para este ID"));
		repository.delete(entity);
	}
}
