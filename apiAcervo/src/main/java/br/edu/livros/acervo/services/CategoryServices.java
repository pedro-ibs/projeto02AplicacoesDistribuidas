package br.edu.livros.acervo.services;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import br.edu.livros.acervo.converter.DozerConverter;
import br.edu.livros.acervo.data.model.Category;
import br.edu.livros.acervo.data.vo.v1.CategoryVO;
import br.edu.livros.acervo.exception.ResourceNotFoundException;
import br.edu.livros.acervo.repository.CategoryRepository;

@Service
public class CategoryServices {
	
	@Autowired
	CategoryRepository repository;
	
	public CategoryVO create(CategoryVO category) {
		var entity = DozerConverter.parseObject(category, Category.class);
		var vo = DozerConverter.parseObject(repository.save(entity), CategoryVO.class);
		return vo;
	}
	
	public List<CategoryVO> findAll() {
		return DozerConverter.parseListObjects(repository.findAll(), CategoryVO.class);
	}
	
	public CategoryVO findById(Long id) {
		var entity = repository.findById(id) .orElseThrow(() -> new ResourceNotFoundException ("Não encontramos registros para este ID"));
		return DozerConverter.parseObject(entity, CategoryVO.class);
	}
	
	public CategoryVO update(CategoryVO category) {
		var entity = repository.findById(category.getKey()).orElseThrow(() -> new ResourceNotFoundException ("Não encontramos registros para este ID"));
		entity.setCategory(category.getCategory());

		var vo = DozerConverter.parseObject(repository.save(entity), CategoryVO.class);
		return vo;
	}
	
	public void delete(Long id) {
		Category entity = repository.findById(id).orElseThrow(() -> new ResourceNotFoundException("Não encontramos registros para este ID"));
		repository.delete(entity);
	}
}
