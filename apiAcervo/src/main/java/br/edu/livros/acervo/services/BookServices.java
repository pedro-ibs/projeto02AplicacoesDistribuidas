package br.edu.livros.acervo.services;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import br.edu.livros.acervo.converter.DozerConverter;
import br.edu.livros.acervo.data.model.Book;
import br.edu.livros.acervo.data.vo.BookVO;
import br.edu.livros.acervo.exception.ResourceNotFoundException;
import br.edu.livros.acervo.repository.BookRepository;

@Service
public class BookServices {
	
	@Autowired
	BookRepository repository;
	
	public BookVO create(BookVO book) {
		var entity = DozerConverter.parseObject(book, Book.class);
		var vo = DozerConverter.parseObject(repository.save(entity), BookVO.class);
		return vo;
	}
	
	public List<BookVO> findAll() {
		return DozerConverter.parseListObjects(repository.findAll(), BookVO.class);
	}
	
	public BookVO findById(Long id) {
		var entity = repository.findById(id) .orElseThrow(() -> new ResourceNotFoundException ("Não encontramos registros para este ID"));
		return DozerConverter.parseObject(entity, BookVO.class);
	}
	
	public BookVO update(BookVO book) {
		var entity = repository.findById(book.getId()).orElseThrow(() -> new ResourceNotFoundException ("Não encontramos registros para este ID"));

		entity.setTitle(book.getTitle());
		entity.setAuthor(book.getAuthor());
		entity.setYear(book.getYear());
		entity.setIdCategory(book.getIdCategory());
		entity.setPages(book.getPages());	
		entity.setImage(book.getImage());
		entity.setDescription(book.getDescription());
		entity.setDate(book.getDate());
		
		var vo = DozerConverter.parseObject(repository.save(entity), BookVO.class);
		return vo;
	}
	
	public void delete(Long id) {
		Book entity = repository.findById(id).orElseThrow(() -> new ResourceNotFoundException("Não encontramos registros para este ID"));
		repository.delete(entity);
	}
}
