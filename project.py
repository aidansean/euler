from project_module import project_object, image_object, link_object, challenge_object

p = project_object('euler', 'Project Euler')
p.domain = 'http://www.aidansean.com/'
p.path = 'euler'
p.preview_image_ = image_object('http://placekitten.com.s3.amazonaws.com/homepage-samples/408/287.jpg', 408, 287)
p.github_repo_name = 'euler'
p.mathjax = False
p.links.append(link_object(p.domain, 'euler/', 'Live page'))
p.introduction = 'To hone my problem solving skills I occasionally take part in Project Euler, which is a series of mathematical and computational problems.  These pages summarise my solutions and strategies.'
p.overview = '''This is just a collections of pages that show solutions to the problems.  There's nothing particularly special about these pages.'''
