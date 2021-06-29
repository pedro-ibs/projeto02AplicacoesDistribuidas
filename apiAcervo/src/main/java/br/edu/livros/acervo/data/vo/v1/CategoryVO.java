package br.edu.livros.acervo.data.vo.v1;

import java.io.Serializable;
import org.springframework.hateoas.RepresentationModel;
import com.github.dozermapper.core.Mapping;


public class CategoryVO extends RepresentationModel implements Serializable {
	
	private static final long serialVersionUID = 1L;
	
	@Mapping("id")
	private Long Key;
	private String category;
	
	public Long getKey() {
		return Key;
	}
	public void setKey(Long key) {
		Key = key;
	}
	public String getCategory() {
		return category;
	}
	public void setCategory(String category) {
		this.category = category;
	}
	
	@Override
	public int hashCode() {
		final int prime = 31;
		int result = super.hashCode();
		result = prime * result + ((Key == null) ? 0 : Key.hashCode());
		result = prime * result + ((category == null) ? 0 : category.hashCode());
		return result;
	}
	
	@Override
	public boolean equals(Object obj) {
		if (this == obj)
			return true;
		if (!super.equals(obj))
			return false;
		if (getClass() != obj.getClass())
			return false;
		CategoryVO other = (CategoryVO) obj;
		if (Key == null) {
			if (other.Key != null)
				return false;
		} else if (!Key.equals(other.Key))
			return false;
		if (category == null) {
			if (other.category != null)
				return false;
		} else if (!category.equals(other.category))
			return false;
		return true;
	}
}
