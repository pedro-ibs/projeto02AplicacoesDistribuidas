package br.edu.livros.acervo.controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import br.edu.livros.acervo.data.vo.v1.BookVO;
import br.edu.livros.acervo.services.BookServices;

import static org.springframework.hateoas.server.mvc.WebMvcLinkBuilder.methodOn;
import static org.springframework.hateoas.server.mvc.WebMvcLinkBuilder.linkTo;


@RestController
@RequestMapping("/api/book/v1")
public class BookController {	
	
	@Autowired
	private BookServices services;
	
	@GetMapping(produces = {"application/json", "application/xml", "application/x-yaml"})
	public List<BookVO> findAll() {
		List<BookVO> books = services.findAll();
		books.stream().forEach(p -> p.add( linkTo( methodOn( BookController.class ).findById(p.getKey())).withSelfRel() ));
		return books;
	}
	
	@GetMapping(value = "/{id}", produces = {"application/json", "application/xml", "application/x-yaml"} )
	public BookVO findById(@PathVariable("id") Long id) {
		BookVO bookVO  = services.findById(id);
		bookVO.add( linkTo( methodOn( BookController.class ).findById(id)).withSelfRel() );
		return bookVO;
	}
	
	@PostMapping(produces = {"application/json", "application/xml", "application/x-yaml"}, consumes = {"application/json", "application/xml", "application/x-yaml"} )
	public BookVO create(@RequestBody BookVO book) {
		BookVO bookVO  = services.create(book);
		bookVO.add( linkTo( methodOn( BookController.class ).findById(book.getKey())).withSelfRel() );
		return bookVO;
	}
	
	@PutMapping(produces = {"application/json", "application/xml", "application/x-yaml"}, consumes = {"application/json", "application/xml", "application/x-yaml"})
	public BookVO update(@RequestBody BookVO book) {
		BookVO bookVO  = services.update(book);
		bookVO.add( linkTo( methodOn( BookController.class ).findById(book.getKey())).withSelfRel() );
		return bookVO;
	}
	
	@DeleteMapping("/{id}")
	public ResponseEntity<?> delete(@PathVariable("id") Long id) {
		services.delete(id);
		return ResponseEntity.ok().build(); 
	}
}